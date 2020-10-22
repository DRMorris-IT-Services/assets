$variable1 = '123'
$variable2 = $env:computername

$ipV4 = Test-Connection -ComputerName (hostname) -Count 1  | Select -ExpandProperty IPV4Address

$variable3 = $ipV4
$variable4 = (Get-WmiObject Win32_OperatingSystem).Caption
$variable5 = (Get-WmiObject -Class:Win32_ComputerSystem).Model
$variable6 = (Get-WmiObject -Class:Win32_ComputerSystem).manufacturer
 
$user = whoami
$variable7 = Get-WMIObject Win32_UserAccount | where caption -eq $user | select Name
 

start microsoft-edge:http://dev2.drmorris-itservices.de/assets/onboard/$($variable1)/$($variable2)/$($variable3)/$($variable4)/$($variable5)/$($variable6)/$($variable7) 

   
