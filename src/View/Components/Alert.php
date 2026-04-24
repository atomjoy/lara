<?php

namespace Lara\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class Alert extends Component
{
    /**
     * The properties / methods that should not be exposed to the component template.
     *
     * @var array
     */
    protected $except = ['example'];

    /**
     * Create a new component instance.
     */
    public function __construct(
        public $type = 'success',
        public $message = '',
    ) {
        if (!in_array($type, ['success', 'error', 'warning'])) {
            $this->type = 'success';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('lara::components.email.alert');
    }

    /**
     * Whether the component should be rendered
     */
    public function shouldRender(): bool
    {
        return Str::length($this->message) > 0;
    }

    /**
     * Determine if the given option is the currently selected option.
     */
    public function isSelected(): bool
    {
        return $this->type == 'success';
    }
}
