<?php
use League\JsonGuard\Dereferencer;
use PHPUnit\Framework\TestCase;

class ExamplesSchemaTest extends TestCase
{
    public function testExamples()
    {
        $basePath = "examples/";
        $deref = new Dereferencer();
        $schema = $deref->dereference('file://schema.json');

        foreach(array_diff(scandir($basePath), ['.', '..']) as $file) {
            $path = $basePath . $file;
            if(pathinfo($path, PATHINFO_EXTENSION) === 'json') {
                $data = json_decode(file_get_contents($path));
                $validator = new League\JsonGuard\Validator($data, $schema);
                $errors = [];

                if($validator->fails()) {
                    foreach($validator->errors() as $e) {
                        $errors[] = sprintf("Failing file: %s. Validation error: %s", $path, $e->getMessage());
                    }
                }

                $this->assertTrue($validator->passes(), join('; ', $errors));
            }
        }
    }
}