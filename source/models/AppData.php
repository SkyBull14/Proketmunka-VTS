<?php
require_once __DIR__ . '/../core/AccessibleProperties.php';

class AppData
{
    use AccessibleProperties;

    public string $siteUrl = 'http://localhost:8080';
    public string $siteTitle = 'Paw in Hand :: Kutyasétáltató';
    public string $siteType = 'app';

    public string $viewName = 'index';

    public function __construct($data)
    {
        $this->__parseData($data);
        $this->siteUrl = getenv('APP_URL') ?: $this->siteUrl;
    }
}