
#If your Vagrant version is lower than 1.5, you can still use this provisioning
#by commenting or removing the line below and providing the config.vm.box_url parameter,
#if it's not already defined in this Vagrantfile. Keep in mind that you won't be able
#to use the Vagrant Cloud and other newer Vagrant features.
Vagrant.require_version ">= 1.5"

# Check to determine whether we're on a windows or linux/os-x host,
# later on we use this to launch ansible in the supported way
# source: https://stackoverflow.com/questions/2108727/which-in-ruby-checking-if-program-exists-in-path-from-ruby
def which(cmd)
    exts = ENV['PATHEXT'] ? ENV['PATHEXT'].split(';') : ['']
    ENV['PATH'].split(File::PATH_SEPARATOR).each do |path|
        exts.each { |ext|
            exe = File.join(path, "#{cmd}#{ext}")
            return exe if File.executable? exe
        }
    end
    return nil
end

Vagrant.configure(2) do |config|
  # Optional (Remove if desired)
  config.vm.provider :virtualbox do |v|
    v.customize [
      "modifyvm", :id,
      "--memory", 1024,
      "--ioapic", "on",
      "--cpus", 1
    ]
  end
      
  # Base Box
  # --------------------
  config.vm.box = "ubuntu/trusty64"

  # Connect to IP
  # Note: Use an IP that doesn't conflict with any OS's DHCP (Below is a safe bet)
  # --------------------
  config.vm.network :private_network, ip: "192.168.50.4"

  # Forward to Port
  # --------------------
  #config.vm.network :forwarded_port, guest: 80, host: 8080

  # Provisioning Script
  # --------------------
  # If ansible is in your path it will provision from your HOST machine
  # If ansible is not found in the path it will be instaled in the VM and provisioned from there    
  if which('ansible-playbook')
    config.vm.provision "ansible" do |ansible|
      ansible.playbook = "ansible/playbook.yml"
      ansible.inventory_path = "ansible/inventories/dev"
      ansible.limit = 'all'
      # ansible.verbose = 'vvv'
    end
  else
    config.vm.provision :shell, path: "ansible/windows.sh"
  end

  # Synced Folder
  # --------------------
  config.vm.synced_folder ".", "/vagrant/", :mount_options => [ "dmode=777", "fmode=666" ]
  config.vm.synced_folder "./public", "/vagrant/public/", :mount_options => [ "dmode=775", "fmode=644" ], :owner => 'www-data', :group => 'www-data'

end
