<?php declare(strict_types=1);

namespace AlanVdb\Module;

use AlanVdb\Module\Common\HasCategoryEntity;
use AlanVdb\Module\Common\HasTagEntities;
use DateTime;

class PostEntity
{
    use HasCategoryEntity;
    use HasTagEntities;

    protected $id;
    protected $slug;
    protected $title;
    protected $thumb;
    protected $description;
    protected $body;
    protected $createdAt;
    protected $updatedAt;
    
    public function __construct(?array $data = null)
    {
        if ($data != null) {
            foreach ($data as $attribute => $value) {
                $methodName = 'set' . ucfirst($attribute);
                if (method_exists($this, $methodName)) {
                    $this->$methodName($value);
                }
            }
        }
    }

    public function __get(string $attribute)
    {
        $method = "get" . ucfirst($attribute);
        if (!method_exists($this, $method)) {
            return false;
        }
        return $this->$method();
    }

    public function getId() : ?string
    {
        return $this->id;
    }

    public function setId(?string $id = null) : self
    {
        if ($id === '') {
            throw new \InvalidArgumentException('Empty entity ID provided.');
        }
        $this->id = $id;
        return $this;
    }

    public function getSlug() : ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug = null) : self
    {
        $this->slug = $slug;
        return $this;
    }

    public function getTitle() : ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title = null) : self
    {
        $this->title = $title;
        return $this;
    }

    public function getThumb() : ?string
    {
        return $this->thumb;
    }

    public function setThumb(?string $thumb = null) : self
    {
        $this->thumb = $thumb;
        return $this;
    }

    public function getDescription() : ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description = null) : self
    {
        $this->description = $description;
        return $this;
    }

    public function getBody() : ?string
    {
        return $this->body;
    }

    public function setBody(?string $body = null) : self
    {
        $this->body = $body;
        return $this;
    }

    public function getCreatedAt() : ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $timestamp) : self
    {
        $this->createdAt = new DateTime();
        $this->createdAt->setTimestamp($timestamp);
        return $this;
    }

    public function getUpdatedAt() : ?string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(int $timestamp) : self
    {
        $this->updatedAt = new DateTime();
        $this->updatedAt->setTimestamp($timestamp);
        return $this;
    }
}