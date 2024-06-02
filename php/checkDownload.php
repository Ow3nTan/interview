<?php
session_start();

function checkDownload($memberType) {
    $currentTime = time();

    if (!isset($_SESSION['downloads'])) {
        $_SESSION['downloads'] = [];
    }

    $_SESSION['downloads'] = array_filter($_SESSION['downloads'], function($timestamp) use ($currentTime) {
        return ($currentTime - $timestamp) < 5;
    });

    $downloadCount = count($_SESSION['downloads']);

    if ($memberType == 'non-member') {
        if ($downloadCount > 0) {
            return "Too many downloads";
        } else {
            $_SESSION['downloads'][] = $currentTime;
            return "Download allowed";
        }
    } elseif ($memberType == 'member') {
        if ($downloadCount < 2) {
            $_SESSION['downloads'][] = $currentTime;
            return "Download allowed";
        } else {
            $lastDownloadTime = end($_SESSION['downloads']);
            if ($currentTime - $lastDownloadTime < 5) {
                return "Too many downloads";
            } else {
                $_SESSION['downloads'][] = $currentTime;
                return "Download allowed";
            }
        }
    }
}
?>
