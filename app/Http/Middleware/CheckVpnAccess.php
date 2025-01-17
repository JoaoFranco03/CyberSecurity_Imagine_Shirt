<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckVpnAccess
{
    public function handle(Request $request, Closure $next)
    {
        // Get real IP using MAMP with Apache
        $clientIp = $this->getRealIp($request);
        $allowedIps = ['2.80.250.76', '188.83.23.108']; // Your VPN IP range and specific IP

        // Log the actual IP and headers for debugging
        Log::channel('vpn')->info("VPN access check initiated", [
            'ip' => $clientIp,
            'remote_addr' => $_SERVER['REMOTE_ADDR'] ?? 'not set',
            'x_forwarded_for' => $request->header('X-Forwarded-For'),
            'server_vars' => array_intersect_key($_SERVER, array_flip([
                'REMOTE_ADDR',
                'HTTP_X_FORWARDED_FOR',
                'HTTP_X_FORWARDED',
                'HTTP_FORWARDED_FOR',
                'HTTP_FORWARDED'
            ])),
            'path' => $request->path()
        ]);

        try {
            $allowed = false;
            foreach ($allowedIps as $allowedIp) {
                if ($this->ipInRange($clientIp, $allowedIp)) {
                    $allowed = true;
                    break;
                }
            }

            if (!$allowed) {
                Log::channel('vpn')->warning("VPN access denied", [
                    'ip' => $clientIp,
                    'path' => $request->path()
                ]);
                abort(403, 'Access denied. VPN connection required.');
            }

            return $next($request);
        } catch (\Exception $e) {
            Log::channel('vpn')->error("VPN check error", [
                'ip' => $clientIp,
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
    }

    private function getRealIp(Request $request)
    {
        // For MAMP local development
        if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] !== '127.0.0.1') {
            return $_SERVER['REMOTE_ADDR'];
        }

        // Check X-Forwarded-For header
        $forwardedFor = $request->header('X-Forwarded-For');
        if ($forwardedFor) {
            $ips = array_map('trim', explode(',', $forwardedFor));
            return $ips[0];
        }

        // Fallback to Laravel's method
        return $request->ip();
    }

    private function ipInRange($ip, $range)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === false) {
            return false;
        }

        if (strpos($range, '/') !== false) {
            list($subnet, $bits) = explode('/', $range);
            $ip = ip2long($ip);
            $subnet = ip2long($subnet);
            $mask = -1 << (32 - $bits);
            return ($ip & $mask) === ($subnet & $mask);
        }

        return $ip === $range;
    }
}
