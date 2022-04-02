<?php
 namespace MailPoetVendor\Symfony\Component\DependencyInjection\Compiler; if (!defined('ABSPATH')) exit; use MailPoetVendor\Symfony\Component\DependencyInjection\Definition; class AutowireRequiredMethodsPass extends AbstractRecursivePass { protected function processValue($value, $isRoot = \false) { $value = parent::processValue($value, $isRoot); if (!$value instanceof Definition || !$value->isAutowired() || $value->isAbstract() || !$value->getClass()) { return $value; } if (!($reflectionClass = $this->container->getReflectionClass($value->getClass(), \false))) { return $value; } $alreadyCalledMethods = []; $withers = []; foreach ($value->getMethodCalls() as [$method]) { $alreadyCalledMethods[\strtolower($method)] = \true; } foreach ($reflectionClass->getMethods() as $reflectionMethod) { $r = $reflectionMethod; if ($r->isConstructor() || isset($alreadyCalledMethods[\strtolower($r->name)])) { continue; } while (\true) { if (\false !== ($doc = $r->getDocComment())) { if (\false !== \stripos($doc, '@required') && \preg_match('#(?:^/\\*\\*|\\n\\s*+\\*)\\s*+@required(?:\\s|\\*/$)#i', $doc)) { if (\preg_match('#(?:^/\\*\\*|\\n\\s*+\\*)\\s*+@return\\s++static[\\s\\*]#i', $doc)) { $withers[] = [$reflectionMethod->name, [], \true]; } else { $value->addMethodCall($reflectionMethod->name, []); } break; } if (\false === \stripos($doc, '@inheritdoc') || !\preg_match('#(?:^/\\*\\*|\\n\\s*+\\*)\\s*+(?:\\{@inheritdoc\\}|@inheritdoc)(?:\\s|\\*/$)#i', $doc)) { break; } } try { $r = $r->getPrototype(); } catch (\ReflectionException $e) { break; } } } if ($withers) { $setters = $value->getMethodCalls(); $value->setMethodCalls($withers); foreach ($setters as $call) { $value->addMethodCall($call[0], $call[1], $call[2] ?? \false); } } return $value; } } 