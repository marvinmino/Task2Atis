<?php
use App\Core\Request;
class AlbumRequest extends Request
{
    public function __construct($request)
    {
        $this->input = $request->input();
    }

    public function albumAuth()
    {
        if (empty($this->reqData('albumName'))) {
            session_start();
            $_SESSION['error'] = "album name not set";

        }
    }
}
