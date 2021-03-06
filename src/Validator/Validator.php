<?php

namespace Tolehoai\CarForRent\Validator;

class Validator
{
    public string $name;
    public $value;
    public $file;
    public $patterns = array(
        'uri' => '[A-Za-z0-9-\/_?&=]+',
        'url' => '[A-Za-z0-9-:.\/_?&=#]+',
        'alpha' => '[\p{L}]+',
        'words' => '[\p{L}\s]+',
        'alphanum' => '[\p{L}0-9]+',
        'int' => '[0-9]+',
        'float' => '[0-9\.,]+',
        'tel' => '[0-9+\s()-]+',
        'text' => '[\p{L}0-9\s-.,;:!"%&()?+\'°#\/@]+',
        'file' => '[\p{L}\s0-9-_!%&()=\[\]#@,.;+]+\.[A-Za-z0-9]{2,4}',
        'folder' => '[\p{L}\s0-9-_!%&()=\[\]#@,.;+]+',
        'address' => '[\p{L}0-9\s.,()°-]+',
        'date_dmy' => '[0-9]{1,2}\-[0-9]{1,2}\-[0-9]{4}',
        'date_ymd' => '[0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2}',
        'email' => '[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]'
    );
    public $errors = array();

    public function name($name)
    {
        $this->name = $name;
        return $this;
    }

    public function value($value)
    {
        $this->value = $value;
        return $this;
    }

    public function file($file)
    {
        $this->setFile($file);
        return $this;
    }


    public function pattern($name)
    {
        if ($name == 'array') {
            if (!is_array($this->value)) {
                $this->errors[$this->name] = 'Field format ' . $this->name . ' invalid.';
            }
        } else {
            $regex = '/^(' . $this->patterns[$name] . ')$/u';
            if ($this->value != '' && !preg_match($regex, $this->value)) {
                $this->errors[$this->name] = 'Field format ' . $this->name . ' invalid.';
            }
        }
        return $this;
    }


    public function required()
    {
        if (($this->value == '' || $this->value == null)) {
            $this->errors[$this->name] = 'Field value ' . $this->name . ' is required.';
        }
        return $this;
    }

    public function imageRequired()
    {
        if ($this->file['size'] == 0) {
            $this->errors[$this->name] = 'Field value ' . $this->name . ' is required.';
        }
        return $this;
    }

    public function min($length)
    {
        if (is_string($this->value)) {
            if (strlen($this->value) < $length) {
                $this->errors[$this->name] = 'Field value ' . $this->name . ' less than the minimum value';
            }
        } else {
            if ($this->value < $length) {
                $this->errors[$this->name] = 'Field value ' . $this->name . ' less than the minimum value';
            }
        }
        return $this;
    }

    public function max($length)
    {
        if (is_string($this->value)) {
            if (strlen($this->value) > $length) {
                $this->errors[$this->name] = 'Field value' . $this->name . ' higher than the maximum value';
            }
        } else {
            if ($this->value > $length) {
                $this->errors[$this->name] = 'Field value ' . $this->name . ' higher than the maximum value';
            }
        }
        return $this;
    }


    public function checkSize(int $size)
    {
        if (!empty($this->errors[$this->name])) {
            return $this;
        }
        $maxsize = $size * 1024 * 1024;

        if ($this->file['size'] > $maxsize) {
            $this->errors[$this->name] = "File size is larger than $size MB.";
        }
        return $this;
    }

    public function is_int()
    {
        if (is_numeric($this->value)) {
            return $this;
        }
        $this->errors[$this->name] = 'Field value ' . $this->name . ' must be integer';
        return $this;
    }

    public function ext($extension)
    {
        if ($this->file['error'] != 4 && pathinfo($this->file['name'], PATHINFO_EXTENSION) != $extension && strtoupper(
                pathinfo($this->file['name'], PATHINFO_EXTENSION)
            ) != $extension) {
            $this->errors[$this->name] = 'The file ' . $this->name . ' it is not a ' . $extension . '.';
        }
        return $this;
    }

    public function equal($value)
    {
        if ($this->value != $value) {
            $this->errors[$this->name] = 'Field value ' . $this->name . ' not match.';
        }
        return $this;
    }

    public function getErrors()
    {
        if (!$this->isSuccess()) {
            return $this->errors;
        }
    }


    public function isSuccess()
    {
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file): void
    {
        $this->file = $file;
    }


}