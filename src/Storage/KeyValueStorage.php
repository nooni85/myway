<?php

namespace EdenProject\MyWay\Storage;

/*
 * 키와 값을 쌍으로 저장하는 인터페이스이다.
 * Redis, Session 을 저장할 때 쓰이는 것이다.
 */
interface KeyValueStorage
{
    /*
     * 키를 가져온다
     */
    public function get(string $key): ?string;

    /*
     * 키를 저장한다
     */
    public function set(string $key, $value): void;

    /*
     * 키를 삭제한다.
     */
    public function delete(string $key): void;

    /*
     * 키가 있는지 여부를 확인한다.
     */
    public function hasKey(string $key): bool;
}