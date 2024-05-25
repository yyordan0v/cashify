<?php

namespace App\Traits;

trait HasColor
{
    protected static array $availableColors = [
        'gray',
        'orange',
        'amber',
        'yellow',
        'lime',
        'green',
        'emerald',
        'teal',
        'cyan',
        'sky',
        'blue',
        'indigo',
        'violet',
        'purple',
        'fuchsia',
        'pink',
        'rose',
    ];

    protected static string $defaultColor = 'gray';

    /**
     * Get the full Tailwind class for the color.
     *
     * @return string
     */
    public function getColorClassAttribute(): string
    {
        // Use the model's shade value or a default of 300 if not set
        $shade = property_exists($this, 'shade') ? $this->shade : 300;
        return 'bg-'.$this->color.'-'.$shade;
    }

    /**
     * Set the color attribute.
     *
     * @param  string  $color
     */
    public function setColorAttribute(string $color): void
    {
        $this->attributes['color'] = $color;
    }

    /**
     * Get the color attribute.
     *
     * @return string
     */
    public function getColorAttribute(): string
    {
        return $this->attributes['color'];
    }

    /**
     * Get the available colors.
     *
     * @return array
     */
    public static function getAvailableColors(): array
    {
        return self::$availableColors;
    }

    /**
     * Get the default color.
     *
     * @return string
     */
    public static function getDefaultColor(): string
    {
        return self::$defaultColor;
    }
}
