<?php

class Jenkins_QueueItem
{
  /**
   * @var stdClass
   */
  private $queueItem;

  /**
   * @var Jenkins
   */
  protected $jenkins;

  /**
   * @param stdClass $queue
   * @param Jenkins  $jenkins
   */
  public function __construct($queueItem, Jenkins $jenkins)
  {
    $this->queueItem = $queueItem;
    $this->setJenkins($jenkins);
  }

  /**
   * @return string
   */
  public function getBuildId()
  {

    // Executatble doesn't exist until jenkins starts to build the queued item
    if(isset($this->queueItem->executable->number))
    {
      return $this->queueItem->executable->number;
    }

    return '';
  }

  /**
   * @return string
   */
  public function getQueueUrl()
  {
    return $this->queueItem->url;
  }

  /**
   * @return \Jenkins
   */
  public function getJenkins()
  {
    return $this->jenkins;
  }

  /**
   * @param \Jenkins $jenkins
   *
   * @return \Jenkins_Queue
   */
  public function setJenkins(Jenkins $jenkins)
  {
    $this->jenkins = $jenkins;

    return $this;
  }

}
