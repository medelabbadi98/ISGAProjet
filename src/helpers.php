<?php

function candidat()
{
    $user = auth()->user();

    if ($user->isCandidat()) {
        return $user;
    }

    return null;
}

function recruteur()
{
    $user = auth()->user();

    if ($user->isRecruteur()) {
        return $user;
    }

    return null;
}

?>