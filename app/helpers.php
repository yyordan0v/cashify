<?php

if (!function_exists('flashToast')) {
    function flashToast($type, $description, $title = null, $position = 'top-right'): void
    {
        if (is_null($title)) {
            $title = match ($type) {
                'success' => 'Success',
                'error' => 'Error',
                'warning' => 'Warning',
                'info' => 'Info',
                default => 'Notification',
            };
        }

        $toasts = session()->get('toasts', []);
        $toasts[] = [
            'type' => $type,
            'title' => $title,
            'description' => $description,
            'position' => $position
        ];

        session()->flash('toasts', $toasts);
    }
}
