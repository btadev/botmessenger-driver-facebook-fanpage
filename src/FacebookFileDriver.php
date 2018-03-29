<?php

        $messages = Collection::make($this->event->get('messaging'))->filter(function ($msg) {
