<?php
	$x = "l
	vv";
	echo $x;

	$xml = "l\nvv";
	echo $xml;
	
	/*$xml = <<<XML
	l
	vv
	XML;*/
	
	$txt = "line1" . 
			"line2" . 
			"line3";
	echo $txt;
	echo "<br>";
	
	/*class my {
		public $str = <<<STR
		this is
		a long2iplon
		long ong
		STR;
	}
	
	$a1 = new my();
	var_dump($a1 -> str);*/
	echo "<br>";
	
	$expand = 3;
	$either = 8;
	echo 'this is a simple string';

echo 'You can also have embedded newlines in 
strings this way as it is
okay to do';

// Outputs: Arnold once said: "I'll be back"
echo 'Arnold once said: "I\'ll be back"';

// Outputs: You deleted C:\*.*?
echo 'You deleted C:\\*.*?';

// Outputs: You deleted C:\*.*?
echo 'You deleted C:\*.*?';

// Outputs: This will not expand: \n a newline
echo 'This will not expand: \n a newline';

// Outputs: Variables do not $expand $either
echo 'Variables do not $expand $either';

	echo "<br>";
	echo "aa\n\n\nbb";
	echo "<br>";
	echo 'aa\nbb';
	echo "<br>";
	echo "aa\rbb";
	echo "<br>";
	echo 'aa\rbb';
	
	echo "<br>";
	$a2 = <<<AAA
	this is
	long long
AAA;

	echo $a2;
	
	echo "<br><br>";
	
	$str = <<<EOD
Example of string
spanning multiple lines
using heredoc syntax.
EOD;

/* More complex example, with variables. */
class foo
{
    var $foo;
    var $bar;

    function foo()
    {
        $this->foo = 'Foo';
        $this->bar = array('Bar1', 'Bar2', 'Bar3');
    }
}

$foo = new foo();
$name = 'MyName';

echo <<<EOT
My name is "$name". I am printing some $foo->foo.
Now, I am printing some {$foo->bar[1]}.
This should print a capital 'A': \x41
EOT;

?>

























