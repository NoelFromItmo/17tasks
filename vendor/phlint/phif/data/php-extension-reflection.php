<?php

class Reflection
{
    function export(Reflector $reflector, bool $return = false) : string {}
    function getModifierNames(int $modifiers) : array {}
}

class ReflectionClass implements Reflector
{
    function __clone() {}
    function __construct($argument) {}
    function __toString() : string {}
    function export($argument, bool $return = false) : string {}
    function getConstant(string $name) {}
    function getConstants() : array {}
    function getConstructor() : ReflectionMethod {}
    function getDefaultProperties() : array {}
    function getDocComment() : string {}
    function getEndLine() : int {}
    function getExtension() : ReflectionExtension {}
    function getExtensionName() : string {}
    function getFileName() : string {}
    function getInterfaceNames() : array {}
    function getInterfaces() : array {}
    function getMethod(string $name) : ReflectionMethod {}
    function getMethods(int $filter = 0) : array {}
    function getModifiers() : int {}
    function getName() : string {}
    function getNamespaceName() : string {}
    function getParentClass() : ReflectionClass {}
    function getProperties(int $filter = 0) : array {}
    function getProperty(string $name) : ReflectionProperty {}
    function getReflectionConstant(string $name) : ReflectionClassConstant {}
    function getReflectionConstants() : array {}
    function getShortName() : string {}
    function getStartLine() : int {}
    function getStaticProperties() : array {}
    function getStaticPropertyValue(string $name, &$def_value = null) {}
    function getTraitAliases() : array {}
    function getTraitNames() : array {}
    function getTraits() : array {}
    function hasConstant(string $name) : bool {}
    function hasMethod(string $name) : bool {}
    function hasProperty(string $name) : bool {}
    function implementsInterface(string $interface) : bool {}
    function inNamespace() : bool {}
    function isAbstract() : bool {}
    function isAnonymous() : bool {}
    function isCloneable() : bool {}
    function isFinal() : bool {}
    function isInstance($object) : bool {}
    function isInstantiable() : bool {}
    function isInterface() : bool {}
    function isInternal() : bool {}
    function isIterable() : bool {}
    function isIterateable() : bool {}
    function isSubclassOf(string $class) : bool {}
    function isTrait() : bool {}
    function isUserDefined() : bool {}
    function newInstance($args, ...$__variadic) {}
    function newInstanceArgs(array $args = []) {}
    function newInstanceWithoutConstructor() {}
    function setStaticPropertyValue(string $name, $value) {}
}

class ReflectionClassConstant implements Reflector
{
    function __clone() {}
    function __construct($class, string $name) {}
    function __toString() : string {}
    function export($class, string $name, bool $return = false) : string {}
    function getDeclaringClass() : ReflectionClass {}
    function getDocComment() : string {}
    function getModifiers() : int {}
    function getName() : string {}
    function getValue() {}
    function isPrivate() : bool {}
    function isProtected() : bool {}
    function isPublic() : bool {}
}

class ReflectionException extends Exception {}

class ReflectionExtension implements Reflector
{
    function __clone() {}
    function __construct(string $name) {}
    function __toString() : string {}
    function export(string $name, string $return = false) : string {}
    function getClasses() : array {}
    function getClassNames() : array {}
    function getConstants() : array {}
    function getDependencies() : array {}
    function getFunctions() : array {}
    function getINIEntries() : array {}
    function getName() : string {}
    function getVersion() : string {}
    function info() {}
    function isPersistent() {}
    function isTemporary() {}
}

class ReflectionFunction extends ReflectionFunctionAbstract implements Reflector
{
    function __construct($name) {}
    function __toString() : string {}
    function export(string $name, string $return = '') : string {}
    function getClosure() : Closure {}
    function invoke($parameter = null, ...$__variadic) {}
    function invokeArgs(array $args) {}
    function isDisabled() : bool {}
}

class ReflectionFunctionAbstract implements Reflector
{
    function __clone() {}
    function __toString() {}
    function getClosureScopeClass() : ReflectionClass {}
    function getClosureThis() {}
    function getDocComment() : string {}
    function getEndLine() : int {}
    function getExtension() : ReflectionExtension {}
    function getExtensionName() : string {}
    function getFileName() : string {}
    function getName() : string {}
    function getNamespaceName() : string {}
    function getNumberOfParameters() : int {}
    function getNumberOfRequiredParameters() : int {}
    function getParameters() : array {}
    function getReturnType() : ReflectionType {}
    function getShortName() : string {}
    function getStartLine() : int {}
    function getStaticVariables() : array {}
    function hasReturnType() : bool {}
    function inNamespace() : bool {}
    function isClosure() : bool {}
    function isDeprecated() : bool {}
    function isGenerator() : bool {}
    function isInternal() : bool {}
    function isUserDefined() : bool {}
    function isVariadic() : bool {}
    function returnsReference() : bool {}
}

class ReflectionGenerator
{
    function __construct(Generator $generator) {}
    function getExecutingFile() : string {}
    function getExecutingGenerator() : Generator {}
    function getExecutingLine() : int {}
    function getFunction() : ReflectionFunctionAbstract {}
    function getThis() {}
    function getTrace(int $options = DEBUG_BACKTRACE_PROVIDE_OBJECT) : array {}
}

class ReflectionMethod extends ReflectionFunctionAbstract implements Reflector
{
    function __construct(string $class_method, string $name) {}
    function __toString() : string {}
    function export(string $class, string $name, bool $return = false) : string {}
    function getClosure($object) : Closure {}
    function getDeclaringClass() : ReflectionClass {}
    function getModifiers() : int {}
    function getPrototype() : ReflectionMethod {}
    function invoke($object, $parameter = null, ...$__variadic) {}
    function invokeArgs($object, array $args) {}
    function isAbstract() : bool {}
    function isConstructor() : bool {}
    function isDestructor() : bool {}
    function isFinal() : bool {}
    function isPrivate() : bool {}
    function isProtected() : bool {}
    function isPublic() : bool {}
    function isStatic() : bool {}
    function setAccessible(bool $accessible) {}
}

class ReflectionNamedType extends ReflectionType
{
    function getName() : string {}
}

class ReflectionObject extends ReflectionClass implements Reflector
{
    function __construct($argument) {}
    function export(string $argument, bool $return = false) : string {}
}

class ReflectionParameter implements Reflector
{
    function __clone() {}
    function __construct(string $function, string $parameter) {}
    function __toString() : string {}
    function allowsNull() : bool {}
    function canBePassedByValue() : bool {}
    function export(string $function, string $parameter, bool $return = false) : string {}
    function getClass() : ReflectionClass {}
    function getDeclaringClass() : ReflectionClass {}
    function getDeclaringFunction() : ReflectionFunctionAbstract {}
    function getDefaultValue() {}
    function getDefaultValueConstantName() : string {}
    function getName() : string {}
    function getPosition() : int {}
    function getType() : ReflectionType {}
    function hasType() : bool {}
    function isArray() : bool {}
    function isCallable() : bool {}
    function isDefaultValueAvailable() : bool {}
    function isDefaultValueConstant() : bool {}
    function isOptional() : bool {}
    function isPassedByReference() : bool {}
    function isVariadic() : bool {}
}

class ReflectionProperty implements Reflector
{
    function __clone() {}
    function __construct($class, string $name) {}
    function __toString() : string {}
    function export($class, string $name, bool $return = false) : string {}
    function getDeclaringClass() : ReflectionClass {}
    function getDocComment() : string {}
    function getModifiers() : int {}
    function getName() : string {}
    function getValue($object = null) {}
    function isDefault() : bool {}
    function isPrivate() : bool {}
    function isProtected() : bool {}
    function isPublic() : bool {}
    function isStatic() : bool {}
    function setAccessible(bool $accessible) {}
    function setValue($value, $value) {}
}

class ReflectionType
{
    function __clone() {}
    function __toString() : string {}
    function allowsNull() : bool {}
    function isBuiltin() : bool {}
}

class ReflectionZendExtension implements Reflector
{
    function __clone() {}
    function __construct(string $name) {}
    function __toString() : string {}
    function export(string $name, bool $return = false) : string {}
    function getAuthor() : string {}
    function getCopyright() : string {}
    function getName() : string {}
    function getURL() : string {}
    function getVersion() : string {}
}

interface Reflector
{
    function export() : string {}
    function __toString() : string {}
}
