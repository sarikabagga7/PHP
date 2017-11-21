<?php
interface IGateway
{
  public function setData(array $data);
  public function outputData(string $output);
  public function processTransaction();
  public function getFriendlyErrorMessage();
}
