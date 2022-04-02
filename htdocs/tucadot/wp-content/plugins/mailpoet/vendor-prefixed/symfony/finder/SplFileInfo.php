<?php
 namespace MailPoetVendor\Symfony\Component\Finder; if (!defined('ABSPATH')) exit; class SplFileInfo extends \SplFileInfo { private $relativePath; private $relativePathname; public function __construct(string $file, string $relativePath, string $relativePathname) { parent::__construct($file); $this->relativePath = $relativePath; $this->relativePathname = $relativePathname; } public function getRelativePath() { return $this->relativePath; } public function getRelativePathname() { return $this->relativePathname; } public function getFilenameWithoutExtension() : string { $filename = $this->getFilename(); return \pathinfo($filename, \PATHINFO_FILENAME); } public function getContents() { \set_error_handler(function ($type, $msg) use(&$error) { $error = $msg; }); $content = \file_get_contents($this->getPathname()); \restore_error_handler(); if (\false === $content) { throw new \RuntimeException($error); } return $content; } } 