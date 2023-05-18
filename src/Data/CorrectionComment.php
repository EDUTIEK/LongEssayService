<?php

namespace Edutiek\LongEssayAssessmentService\Data;

class CorrectionComment
{
    const RATING_CARDINAL = 'cardinal';
    const RAITNG_FAILURE = 'failure';
    const RAITNG_EXCELLENT = 'excellent';

    protected string $key = '';
    protected string $item_key = '';
    protected string $corrector_key = '';
    protected int $start_position = 0;
    protected int $end_position = 0;
    protected int $parent_number = 0;
    protected string $comment = '';
    protected string $rating = '';

    public function __construct(
        string $key,
        string $item_key,
        string $corrector_key,
        int $start_position,
        int $end_position,
        int $parent_number,
        string $comment,
        string $rating
    )
    {
        $this->key = $key;
        $this->item_key = $item_key;
        $this->corrector_key = $corrector_key;
        $this->start_position = $start_position;
        $this->end_position = $end_position;
        $this->parent_number = $parent_number;
        $this->comment = $comment;
        $this->rating = $rating;
    }

    /**
     * Get the unique key of the comment
     * Starts with 'temp' for a not yet saved comment
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * Get the key of the correction item to which the comment belongs
     */
    public function getItemKey(): string
    {
        return $this->item_key;
    }

    /**
     * Get the key of the corrector to which the comment belongs
     */
    public function getCorrectorKey(): string
    {
        return $this->corrector_key;
    }


    /**
     * Get the number of the first word from the marked text to which the comment belongs
     */
    public function getStartPosition(): int
    {
        return $this->start_position;
    }

    /**
     * Get the number of the last word fom the marked text to which the comment belongs
     */
    public function getEndPosition(): int
    {
        return $this->end_position;
    }

    /**
     * Get the number of the parent paragraph of the first marked word
     */
    public function getParentNumber(): int
    {
        return $this->parent_number;
    }


    /**
     * Get the textual comment
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * Get the rating flag (see constants)
     */
    public function getRating(): string
    {
        return $this->rating;
    }

}
