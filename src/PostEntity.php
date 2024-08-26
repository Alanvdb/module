<?php declare(strict_types=1);

namespace AlanVdb\Module;

use AlanVdb\Module\Common\HasCategoryEntity;
use AlanVdb\Module\Common\HasTagEntities;
use AlanVdb\Module\ImageEntity;
use DateTime;

class PostEntity
{
    use HasCategoryEntity;
    use HasTagEntities;

    protected ?string      $id          = null;
    protected ?string      $slug        = null;
    protected ?string      $title       = null;
    protected ?ImageEntity $thumb       = null;
    protected ?string      $description = null;
    protected ?string      $body        = null;
    protected ?DateTime    $createdAt   = null;
    protected ?DateTime    $updatedAt   = null;
    
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

    public function getThumb() : ?ImageEntity
    {
        return $this->thumb;
    }

    public function setThumb(?ImageEntity $thumb = null) : self
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

    public function setCreatedAt(DateTime $date) : self
    {
        $this->createdAt = $date;
        return $this;
    }

    public function getUpdatedAt() : ?string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $date) : self
    {
        $this->updatedAt = $date;
        return $this;
    }
}