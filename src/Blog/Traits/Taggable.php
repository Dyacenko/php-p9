<?php declare(strict_types = 1);

namespace App\Blog\Traits;

use App\Blog\Tag;

trait Taggable
{
    private $tags;

    /**
     * Get the value of tags
     */ 
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * Set the value of tags
     *
     * @return  self
     */ 
    public function setTags(array $tags) : self
    {
        $this->tags = $tags;

        return $this;
    }

    public function addTags(Tag $tag): self
    {
        // si le tag n'est pas présent dans la liste,
        // on l'ajoute à la liste
        if(!in_array($tag, $this->tags))
        $this->tags[] = $tag;

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        $index = array_search($tag, $this->tags);

        if($index !== false) {
            // le tag a été trouvé
            // suppression du tag trouvé
            array_splice($this->tags, $index, 1);
        }

        return $this;
    }
}