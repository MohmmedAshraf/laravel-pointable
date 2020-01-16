<?php

namespace Outhebox\Pointable\Contracts;

interface Pointable
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function transactions();

    /**
     * @return mix
     */
    public function countTransactions();

    /**
     * @param $amount
     * @param $message
     * @param $data
     *
     * @return static
     */
    public function addPoints($amount, $message, $data = null);
}
