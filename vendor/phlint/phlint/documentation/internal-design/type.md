Internal Design: Type
=====================

- use one concept per variable, not multiple concepts, multiple concepts can be allowed through complex concepts
- use concepts for constraints, a concept can consist of multiple concepts using || constraint
- use template specializations for different types


function isCool ($concept) {
	return in_array($concept, ['numeric', 'interface:\A']);
}

function x (/** @var isCool */ $y) {
	
}

/** @var isCool[] */
$a = new \ArrayObject();

$a->append(); should complain because concept is explicitly se to isCool[]

- only array access is limited to isCool
- elements can be of different types but all have to be of isCool concept, and that is why we call it a concept and not a type
