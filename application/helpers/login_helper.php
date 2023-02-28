<?php

function is_logged_in_siswa()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email', 'id_siswa')) {
        redirect('auth');
        // } else {
        //     $id = $ci->session->userdata('email', 'id_siswa');
        //     if (!$id) {
        //         redirect('auth/blocked');
        //     }
    }
}
function is_logged_in_guru()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email', 'nrp')) {
        redirect('auth');
        // } else {
        //     $id = $ci->session->userdata('email', 'nrp');
        //     if (!$id) {
        //         redirect('auth/blocked');
        //     }
    }
}
function is_logged_in_admin()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email', 'id_admin')) {
        redirect('adminlogin');
        // } else {
        //     $id = $ci->session->userdata('email', 'id_admin');
        //     if (!$id) {
        //         redirect('auth/blocked');
        //     }
    }
}
