<?php

class ArticleEntityWrapper extends EntityDrupalWrapper {

    public function __construct($data) {
        parent::__construct('node', $data);
    }

    public function hasAuthor(): bool {
        return $this->field_author_type->value() != null;
    }

    /**
     * Get the author
     * @return string
     */
    public function getAuthorName(): string {
        if ($this->hasAuthor()) {
            $entity = $this->getAuthorEntity();
            return $entity->label(); // Unified call to get either node title or user name
        } else {
            return "";
        }
    }

    /**
     * Get the author image source url
     */

    public function getAuthorPicture() : string {
        if($this->hasAuthor()) {
            $picture = $this->getAuthorEntity()->field_picture->value()['uri'];
            return image_style_url("author", $picture);
        } else {
            return "";
        }
    }

    /**
     * @return string trimmed author bio note
     */
    public function getAuthorBio(): string {
        return substr($this->getAuthorEntity()->field_bio->value(), 0,200);
    }

    /**
     * Get the author entity from related field
     * @return EntityDrupalWrapper
     * @throws Exception when the author is not set
     */
    private function getAuthorEntity(): EntityDrupalWrapper {
        if ($this->hasAuthor()) {
            if ($this->isAuthorUser()) {
                return $this->field_user;
            } else {
                return $this->field_author;
            }
        } else {
            throw new Exception("The author is not set");
        }
    }

    private function isAuthorUser(): bool {
        return $this->field_author_type->value() == 1;
    }

}

?>