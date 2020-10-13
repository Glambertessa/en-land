<?php

namespace core\component_manager\interfaces;


interface Rep
{
    public function parse(string $url): Rep;

    public function getComponent();

    public function getManifest(string $slug): ?array;

    public function raw();

    public function asArray();

    public function download(string $url, string $path): bool;

    public function upload(string $url, string $path): bool;
}