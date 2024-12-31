<?php
namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $notifications;
    public function __construct()
{

    $this->middleware(function ($request, $next) {
        if (auth()->check()) {
            $this->notifications = auth()->user()->notifications;;
            view()->share('notifications', $this->notifications);
        }

        return $next($request);
    });
}



}
?>
