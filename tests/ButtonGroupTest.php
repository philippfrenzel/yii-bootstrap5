<?php

declare(strict_types=1);

namespace Yiisoft\Yii\Bootstrap5\Tests;

use Yiisoft\Yii\Bootstrap5\Button;
use Yiisoft\Yii\Bootstrap5\ButtonGroup;

/**
 * Tests for Button widget.
 *
 * ButtonGroupTest
 */
final class ButtonGroupTest extends TestCase
{
    public function testContainerOptions(): void
    {
        ButtonGroup::counter(0);

        $html = ButtonGroup::widget()
            ->buttons([
                ['label' => 'button-A'],
                ['label' => 'button-B', 'visible' => true],
                ['label' => 'button-C', 'visible' => false],
                Button::widget()
                    ->label('button-D')
                    ->render(),
            ])
            ->render();

        $expected = <<<HTML
<div id="w1-button-group" class="btn-group" role="group"><button type="button" id="w2-button" class="btn">button-A</button>
<button type="button" id="w3-button" class="btn">button-B</button>
<button id="w0-button" class="btn">button-D</button></div>
HTML;

        $this->assertEqualsWithoutLE($expected, $html);
    }

    public function testButtonOptions(): void
    {
        ButtonGroup::counter(0);

        $html = ButtonGroup::widget()
            ->buttons([
                ['label' => 'button-A', 'options' => ['class' => 'btn-primary', 'type' => 'submit']],
                ['label' => 'button-B'],
            ])
            ->render();

        $expected = <<<HTML
<div id="w0-button-group" class="btn-group" role="group"><button type="submit" id="w1-button" class="btn-primary btn">button-A</button>
<button type="button" id="w2-button" class="btn">button-B</button></div>
HTML;

        $this->assertEqualsWithoutLE($expected, $html);
    }
}
