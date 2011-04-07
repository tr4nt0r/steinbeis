<?php

class Manni_Validate_CheckboxChecked extends Zend_Validate_Abstract {
    const TOO_FEW = 'toFewChecked';
    const TOO_MANY = 'toManyChecked';

    /**
     * @var array
     */
    protected $_messageTemplates = array(
        self::TOO_FEW => "%value% Antworten wurden gewählt, mindestens %min% Antworten sind erforderlich",
        self::TOO_MANY => '%value% Antworten wurden gewählt, maximal %max% Antworten sind erlaubt'
    );
    /**
     * @var array
     */
    protected $_messageVariables = array(
        'min' => '_min',
        'max' => '_max'
    );
    /**
     * Minimum checked
     *
     * @var integer
     */
    protected $_min;
    /**
     * Maximum checked
     *
     * If null, there is no maximum
     *
     * @var integer|null
     */
    protected $_max;
    /**
     * Checkboxgroup to be checked
     *
     * @var string
     */
    protected $_checkboxgroup;


    public function __construct($options) {
        if ($options instanceof Zend_Config) {
            $options = $options->toArray();
        } else if (!is_array($options)) {
            $options = func_get_args();
            $temp['min'] = array_shift($options);
            if (!empty($options)) {
                $temp['max'] = array_shift($options);
            }



            $options = $temp;
        }

        if (!array_key_exists('min', $options)) {
            $options['min'] = 0;
        }

        $this->setMin($options['min']);
        if (array_key_exists('max', $options)) {
            $this->setMax($options['max']);
        }

        if (array_key_exists('checkboxgroup', $options)) {
            $this->setCheckboxGroup($options['checkboxgroup']);
        }
    }

    /**
     * Returns the min option
     *
     * @return integer
     */
    public function getMin() {
        return $this->_min;
    }

    /**
     * Sets the min option
     *
     * @param  integer $min
     * @throws Zend_Validate_Exception
     * @return Manni_Validate_CheckboxChecked Provides a fluent interface
     */
    public function setMin($min) {
        if (null !== $this->_max && $min > $this->_max) {
            /**
             * @see Zend_Validate_Exception
             */
            require_once 'Zend/Validate/Exception.php';
            throw new Zend_Validate_Exception("The minimum must be less than or equal to the maximum length, but $min >"
                    . " $this->_max");
        }
        $this->_min = max(0, (integer) $min);
        return $this;
    }

    /**
     * Returns the max option
     *
     * @return integer|null
     */
    public function getMax() {
        return $this->_max;
    }

    /**
     * Sets the max option
     *
     * @param  integer|null $max
     * @throws Zend_Validate_Exception
     * @return Manni_Validate_CheckboxChecked Provides a fluent interface
     */
    public function setMax($max) {
        if (null === $max) {
            $this->_max = null;
        } else if ($max < $this->_min) {
            /**
             * @see Zend_Validate_Exception
             */
            require_once 'Zend/Validate/Exception.php';
            throw new Zend_Validate_Exception("The maximum must be greater than or equal to the minimum length, but "
                    . "$max < $this->_min");
        } else {
            $this->_max = (integer) $max;
        }

        return $this;
    }

    /**
     * Returns the actual encoding
     *
     * @return string
     */
    public function getCheckboxGroup() {
        return $this->_checkboxgroup;
    }

    /**
     * Sets Checkboxgroup to check
     *
     * @param string $checkboxgroup
     * @return Manni_Validate_CheckboxChecked
     */
    public function setCheckboxGroup($checkboxgroup = null) {
        if ($checkboxgroup === null) {

            require_once 'Zend/Validate/Exception.php';
            throw new Zend_Validate_Exception('No Checkbox Group defined, parameter checkboxgroup is required in Manni_Validate_CheckboxChecked');
        }


        $this->_checkboxgroup = $checkboxgroup;
        return $this;
    }

    public function isValid($value, $data=null) {

        $count = count($data[$this->_checkboxgroup]);
        $this->_setValue($count);

        if ($count < $this->_min) {
            $this->_error(self::TOO_FEW);
        }

        if (null !== $this->_max && $this->_max < $count) {
            $this->_error(self::TOO_MANY);
        }

        if (count($this->_messages)) {
            return false;
        } else {
            return true;
        }
    }

}