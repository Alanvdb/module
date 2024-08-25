<?php declare(strict_types=1);

namespace AlanVdb\Module\Common;

trait HasIncompleteReleaseDate
{
    protected ?string $releaseYear = null;
    protected ?string $releaseMonth = null;
    protected ?string $releaseDay = null;

    public function getReleaseDate(): ?string
    {
        $date = null;
        if ($this->releaseYear !== null) {
            $date = $this->releaseYear;

            if ($this->releaseMonth !== null) {
                $date .= '-' . $this->releaseMonth;

                if ($this->releaseDay !== null) {
                    $date .= '-' . $this->releaseDay;
                }
            }
        }
        return $date;
    }

    /**
     * Sets the release year.
     *
     * @param string $year The release year.
     * @return self
     * @throws \InvalidArgumentException If the year is not a valid 4-digit year.
     */
    public function setReleaseYear(string $year): self
    {
        if (!preg_match('/^[0-9]+$/', $year)) {
            throw new \InvalidArgumentException("Invalid release year: $year.");
        }
        $this->releaseYear = $year;
        return $this;
    }

    /**
     * Sets the release month.
     *
     * @param string $month The release month.
     * @return self
     * @throws \InvalidArgumentException If the month is not valid (01-12).
     */
    public function setReleaseMonth(string $month): self
    {
        if (!preg_match('/^(0[1-9]|1[0-2])$/', $month)) {
            throw new \InvalidArgumentException("Invalid release month: $month. It must be a valid month between 01 and 12.");
        }
        $this->releaseMonth = $month;
        return $this;
    }

    /**
     * Sets the release day.
     *
     * @param string $day The release day.
     * @return self
     * @throws \InvalidArgumentException If the day is not valid (01-31).
     */
    public function setReleaseDay(string $day): self
    {
        if (!preg_match('/^(0[1-9]|[12][0-9]|3[01])$/', $day)) {
            throw new \InvalidArgumentException("Invalid release day: $day. It must be a valid day between 01 and 31.");
        }
        $this->releaseDay = $day;
        return $this;
    }
}
