namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;

class RoleMiddleware
{
public function handle(Request $request, Closure $next, ...$roles)
{
// Pastikan user sudah login
if (! $request->user()) {
return redirect()->route('login');
}

// Periksa apakah user memiliki peran yang sesuai
foreach ($roles as $role) {
if (! $request->user()->hasRole($role)) {
// Jika tidak memiliki peran yang sesuai
return redirect()->route('home')->with('error', 'You do not have access to this page.');
}
}

return $next($request);
}
}
