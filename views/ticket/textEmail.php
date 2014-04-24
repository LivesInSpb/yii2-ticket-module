<?php
use kartik\markdown\Markdown;
$html = $this->render('/ticket/htmlEmail', ['model' => $model]);
$text = Markdown::convert($html);
echo $text;
?>
