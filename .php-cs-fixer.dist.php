<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests'); // 테스트 폴더도 포함

$config = new PhpCsFixer\Config();
return $config->setRules([
    '@PSR12' => true,
    'array_syntax' => ['syntax' => 'short'], // array() 대신 [] 사용
    'ordered_imports' => ['sort_algorithm' => 'alpha'], // use 구문 알파벳순 정렬
    'no_unused_imports' => true, // 사용하지 않는 use 제거
])->setFinder($finder);
