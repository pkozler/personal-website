<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{

    const
        PAGE_PREFIX = 'admin',
        LIST_SUFFIX = 'list',
        FORM_SUFFIX = 'form';

    private $isAdmin;
    private $contentType;

    protected function __construct(string $contentType = null, bool $isAdmin = true)
    {
        $this->middleware('auth');
        $this->isAdmin = $isAdmin;
        $this->contentType = $contentType;
    }

    protected function getListView(array $args = [])
    {
        return $this->createView($args, self::LIST_SUFFIX, $this->contentType);
    }

    protected function getFormView(array $args = [])
    {
        return $this->createView($args, self::FORM_SUFFIX, $this->contentType);
    }

    protected function getView(string $name, array $args = [])
    {
        return $this->createView($args, $name);
    }

    private function createView(array $args, string $name, $path = null)
    {
        $viewName = self::createViewName($name, $path);

        $sharedArgs = [
            'isAdmin' => $this->isAdmin,
        ];

        if ($this->contentType)
        {
            $sharedArgs['contentType'] = $this->contentType;
        }

        return view($viewName, $args, $sharedArgs);
    }

    public static function createViewName(string $name, $path = null)
    {
        $viewName = self::PAGE_PREFIX;

        if (!empty($path))
        {
            $pathStr = is_array($path) ? implode('.', $path) : $path;
            $viewName .= ".$pathStr";
        }

        $viewName .= ".$name";

        return $viewName;
    }

}
