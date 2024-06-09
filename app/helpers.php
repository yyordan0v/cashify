<?php

if (!function_exists('flashToast')) {
    function flashToast($type, $description, $title = null, $position = 'top-right'): void
    {
        if (is_null($title)) {
            $title = match ($type) {
                'success' => 'Success!',
                'error' => 'Error!',
                'warning' => 'Warning!',
                'info' => 'Info!',
                default => 'Notification',
            };
        }

        $data = [
            'type' => $type,
            'description' => $description,
            'title' => $title,
            'position' => $position,
        ];

        session()->flash('toast', $data);
    }
}
