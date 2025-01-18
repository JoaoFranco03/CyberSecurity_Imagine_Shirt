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

        try {
            $allowed = false;
            foreach ($allowedIps as $allowedIp) {
                if ($this->ipInRange($clientIp, $allowedIp)) {
                    $allowed = true;
                    break;
                }
            }

            if (!$allowed) {
                Log::channel('vpn')->info("Access denied from ip: {$clientIp}");
                return response('Access denied', 403);
            }
        } catch (\Exception $e) {
            Log::channel('vpn')->error("Error checking VPN access: " . $e->getMessage());
            return response('Internal Server Error', 500);
        }

        return $next($request);
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
