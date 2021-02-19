$arr = [
'name' => 'Andrew',
'email' => 'andreyo@wizardsdev.com',
]


class EmployerModel {
private string $name;
private string $email;

public function getName(): string
{
return $email;
}

public function setName(string $name): self
{
$this->name = $name;

return $this;
}

public function toArray(): array
{
return [
'name' => $this->name,
'email' => $this->email,
]
}
}