<?php

namespace EdenProject\MyWay\Config;

use EdenProject\MyWay\Exception\ConfigException;

class Config
{
    private string $filePath;
    private array $data = [];

    public function __construct(string $filename)
    {
        $this->filePath = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . $filename . '.json';
        $this->load();
    }

    public function load(): void
    {
        if (!file_exists($this->filePath)) {
            $this->data = [];
            return;
        }

        $content = file_get_contents($this->filePath);
        if ($content === false) {
            throw new ConfigException("Unable to read config file: {$this->filePath}");
        }

        if (empty($content)) {
            $this->data = [];
            return;
        }

        $decoded = json_decode($content, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new ConfigException("Failed to decode JSON from {$this->filePath}: " . json_last_error_msg());
        }

        $this->data = $decoded ?: [];
    }

    public function save(): void
    {
        $dir = dirname($this->filePath);
        if (!is_dir($dir)) {
            if (!mkdir($dir, 0755, true) && !is_dir($dir)) {
                throw new ConfigException("Failed to create directory: {$dir}");
            }
        }

        $content = json_encode($this->data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        if ($content === false) {
            throw new ConfigException("Failed to encode JSON data");
        }

        if (file_put_contents($this->filePath, $content) === false) {
            throw new ConfigException("Unable to write to config file: {$this->filePath}");
        }
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $this->data[$key] ?? $default;
    }

    public function set(string $key, mixed $value): self
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function all(): array
    {
        return $this->data;
    }

    public function remove(string $key): self
    {
        unset($this->data[$key]);
        return $this;
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }
}
