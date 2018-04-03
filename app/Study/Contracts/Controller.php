<?php

namespace App\Study\Contracts;

/**
 * Interface IPractice
 */
interface Controller
{
    /**
     * Entry practice point
     *
     * @param \Illuminate\Http\Request $request
     * @param string $slug
     * @return mixed
     */
    public function index(\Illuminate\Http\Request $request, $slug = false);

    /**
     * Practice results point
     *
     * @param \Illuminate\Http\Request $request
     * @param string $slug
     * @return mixed
     */
    public function results(\Illuminate\Http\Request $request, $slug = false);
}