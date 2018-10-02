<?php

namespace Devtemple\Laralol\Traits;

use Carbon\Carbon;

use Devtemple\Laralol\Exceptions\ValidateOptionsException;

/**
 * This is validation match options trait
 */
trait ValidateMatchOptions {
    /**
     * @var array Additional options for match endpoint
     */
    protected $options;

    /**
     * @var array List of option available keys
     */
    protected $optionKeys = [
        'champion', 'season', 'queue', 'beginIndex', 'endIndex', 'beginTime', 'endTime'
    ];

    /**
     * Getting array with match options
     * @return array Array with prepared options
     */
    private function getQueries() : array
    {
        if (!is_null($this->options)) {
            $this->validateMatchOptions();
            return $this->getEndQuery();
        }

        $this->setMatchOptions();
        $this->validateMatchOptions();
        return $this->getEndQuery();
    }

    /**
     * Set options if options property is null
     * @return array Array with prepared options
     */
    private function setMatchOptions()
    {
        foreach ($this->optionKeys as $key) {
            if (!is_null($this->{$key})) {
                $this->options[$key] = $this->{$key};
            }
        }

        return $this->options;
    }

    /**
     * Validate all match options
     * @return bool Returning true or false
     */
    private function validateMatchOptions() : bool
    {
        // Checking if all fields exists in optionKeys
        if (isset($this->options)) {
            foreach ($this->options as $key => $row) {
                if (!in_array($key, $this->optionKeys)) {
                    throw new ValidateOptionsException("Key $key doesn't exists.");
                }

                if (in_array($key, ['champion', 'season', 'queue', 'beginIndex', 'endIndex'])) {
                    if ($row < 0) {
                        throw new ValidateOptionsException(ucfirst($key) . " value can't be lower than 0.");
                    }
                }
            }
        }

        // Checking if beginIndex and endIndex exists
        if ($this->isIndexExists()) {
            if ($this->options['endIndex'] < $this->options['beginIndex']) {
                throw new ValidateOptionsException("EndIndex can't be lower than BeginIndex");
            }

            if ($this->getIndexOdd() > 100) {
                throw new ValidateOptionsException("The maximum range allowed is 100 between BeginIndex and EndIndex");
            }
        }

        // Checking if beginTime is exists and endTime not
        if ($this->isEndTimeNotSpecified()) {
            throw new ValidateOptionsException('You need define EndTime if you want use BeginTime option.');
        }

        // Checking if beginTime and endTime are defined
        if ($this->isTimeExists()) {
            if ($this->isEndTimeLower()) {
                throw new ValidateOptionsException("EndTime can't be lower than BeginTime");
            }

            if ($this->isTimeOldWeek()) {
                throw new ValidateOptionsException("The maximum time range allowed between BeginTime and EndTime is one week");
            }
        }

        return true;
    }

    /**
     * Check if beginIndex and endIndex exists
     * @return bool True or false
     */
    private function isIndexExists() : bool
    {
        return isset($this->options['beginIndex']) && isset($this->options['endIndex']);
    }

    /**
     * Check if endTime is lower than beginTime
     * @return bool True or falswe
     */
    private function isEndTimeLower() : bool
    {
        return $this->getMicroTime($this->options['endTime']) < $this->getMicroTime($this->options['beginTime']);
    }

    /**
     * Check if beginTime is defined but endTime not
     * @return bool True or false
     */
    private function isEndTimeNotSpecified() : bool
    {
        return isset($this->options['beginTime']) && !isset($this->options['endTime']);
    }

    /**
     * Checking if odd beginTime and endTime is lower than one week
     * @return bool True or false
     */
    private function isTimeOldWeek() : bool
    {
        return $this->getTimeOdd() > (604800 * 1000);
    }

    /**
     * Checking if beginTime and endTime are defined
     * @return bool True or false
     */
    private function isTimeExists() : bool
    {
        return isset($this->options['beginTime']) && isset($this->options['endTime']);
    }

    /**
     * Get odd between beginIndex and endIndex
     * @return int Odd
     */
    private function getIndexOdd() : int
    {
        return $this->options['endIndex'] - $this->options['beginIndex'];
    }

    /**
     * Get odd time between beginTime and endTime
     * @return int Odd time
     */
    private function getTimeOdd() : int
    {
        return $this->getMicroTime($this->options['endTime']) - $this->getMicroTime($this->options['beginTime']);
    }

    /**
     * Prepare options
     * @return array Options query
     */
    private function getEndQuery () : array
    {
        $query = [];

        if (isset($this->options)) {
            foreach ($this->options as $key => $row) {
                if (in_array($key, ['beginTime', 'endTime'])) {
                    $query[$key] = $this->getMicroTime($row);
                } else {
                    $query[$key] = $row;
                }
            }
        }

        return $query;
    }

    /**
     * Get microtime for specifcied field
     * @param  string|int $row This is a time
     * @return int Specified time in microtime format
     */
    private function getMicroTime($row) : int
    {
        if (is_string($row)) {
            return Carbon::parse($row)->timestamp * 1000;
        } elseif (is_int($row)) {
            return Carbon::createFromTimestamp($row)->timestamp * 1000;
        } else {
            return $row->timestamp * 1000;
        }
    }
}
