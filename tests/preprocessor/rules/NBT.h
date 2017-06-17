use pocketmine\utils\Binary;

#define $nbt->put(data) ($nbt->buffer .= data)

#define $nbt->getLong() ($nbt->endianness === 1 ? Binary::readLong($nbt->get(8)) : Binary::readLLong($nbt->get(8)))
#define $nbt->putLong(data) ($nbt->buffer .= $nbt->endianness === 1 ? Binary::writeLong(data) : Binary::writeLLong(data))

#define $nbt->getInt(network) (network === true ? Binary::readVarInt($nbt->buffer, $nbt->offset) : ($nbt->endianness === 1 ? Binary::readInt($nbt->get(4)) : Binary::readLInt($nbt->get(4))))
#define $nbt->putInt(data, network) ($nbt->buffer .= network === true ? Binary::writeVarInt(data) : ($nbt->endianness === 1 ? Binary::writeInt(data) : Binary::writeLInt(data)))

#define $nbt->getShort() ($nbt->endianness === 1 ? Binary::readShort($nbt->get(2)) : Binary::readLShort($nbt->get(2)))
#define $nbt->getSignedShort() ($nbt->endianness === 1 ? Binary::readSignedShort($nbt->get(2)) : Binary::readSignedLShort($nbt->get(2)))
#define $nbt->putShort(data) ($nbt->buffer .= $nbt->endianness === 1 ? Binary::writeShort(data) : Binary::writeLShort(data))

#define $nbt->getFloat() ($nbt->endianness === 1 ? Binary::readFloat($nbt->get(4)) : Binary::readLFloat($nbt->get(4)))
#define $nbt->putFloat(data) ($nbt->buffer .= $nbt->endianness === 1 ? Binary::writeFloat(data) : Binary::writeLFloat(data))

#define $nbt->getDouble() ($nbt->endianness === 1 ? Binary::readDouble($nbt->get(8)) : Binary::readLDouble($nbt->get(8)))
#define $nbt->putDouble(data) ($nbt->buffer .= $nbt->endianness === 1 ? Binary::writeDouble(data) : Binary::writeLDouble(data))

#define $nbt->getByte() (ord($nbt->get(1)))
#define $nbt->putByte(data) ($nbt->buffer .= chr(data))

#define $this->put(data) ($this->buffer .= data)

#define $this->getLong() ($this->endianness === 1 ? Binary::readLong($this->get(8)) : Binary::readLLong($this->get(8)))
#define $this->putLong(data) ($this->buffer .= $this->endianness === 1 ? Binary::writeLong(data) : Binary::writeLLong(data))

#define $this->getInt(network) (network === true ? Binary::readVarInt($this->buffer, $this->offset) : ($this->endianness === 1 ? Binary::readInt($this->get(4)) : Binary::readLInt($this->get(4))))
#define $this->putInt(data, network) ($this->buffer .= network === true ? Binary::writeVarInt(data) : ($this->endianness === 1 ? Binary::writeInt(data) : Binary::writeLInt(data)))


#define $this->getShort() ($this->endianness === 1 ? Binary::readShort($this->get(2)) : Binary::readLShort($this->get(2)))
#define $this->getSignedShort() ($this->endianness === 1 ? Binary::readSignedShort($this->get(2)) : Binary::readSignedLShort($this->get(2)))
#define $this->putShort(data) ($this->buffer .= $this->endianness === 1 ? Binary::writeShort(data) : Binary::writeLShort(data))

#define $this->getFloat() ($this->endianness === 1 ? Binary::readFloat($this->get(4)) : Binary::readLFloat($this->get(4)))
#define $this->putFloat(data) ($this->buffer .= $this->endianness === 1 ? Binary::writeFloat(data) : Binary::writeLFloat(data))

#define $this->getDouble() ($this->endianness === 1 ? Binary::readDouble($this->get(8)) : Binary::readLDouble($this->get(8)))
#define $this->putDouble(data) ($this->buffer .= $this->endianness === 1 ? Binary::writeDouble(data) : Binary::writeLDouble(data))

#define $this->getByte() (ord($this->get(1)))
#define $this->putByte(data) ($this->buffer .= chr(data))
