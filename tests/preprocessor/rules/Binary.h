
#ifdef COMPILE_64
#define Binary::readSignedShort(data) (unpack("n", data)[1] << 48 >> 48)
#define Binary::readSignedLShort(data) (unpack("v", data)[1] << 48 >> 48)
#define Binary::readInt(data) (unpack("N", data)[1] << 32 >> 32)
#define Binary::readLInt(data) (unpack("V", data)[1] << 32 >> 32)
#define Binary::writeLong(data) (pack("NN", data >> 32, data & 0xFFFFFFFF))
#define Binary::readSignedByte(data) (ord(data{0}) << 56 >> 56)
#else
#ifdef COMPILE_32
#define Binary::readSignedShort(data) (unpack("n", data)[1] << 16 >> 16)
#define Binary::readSignedLShort(data) (unpack("v", data)[1] << 16 >> 16)
#define Binary::readInt(data) (unpack("N", data)[1])
#define Binary::readLInt(data) (unpack("V", data)[1])
#define Binary::readSignedByte(data) (ord(data{0}) << 24 >> 24)
#else
#define Binary::readSignedShort(data) (PHP_INT_SIZE === 8 ? unpack("n", data)[1] << 48 >> 48 : unpack("n", data)[1] << 16 >> 16)
#define Binary::readSignedLShort(data) (PHP_INT_SIZE === 8 ? unpack("v", data)[1] << 48 >> 48 : unpack("v", data)[1] << 16 >> 16)
#define Binary::readInt(data) (PHP_INT_SIZE === 8 ? unpack("N", data)[1] << 32 >> 32 : unpack("N", data)[1])
#define Binary::readLInt(data) (PHP_INT_SIZE === 8 ? unpack("V", data)[1] << 32 >> 32 : unpack("V", data)[1])
#define Binary::readSignedByte(data) (PHP_INT_SIZE === 8 ? (ord(data{0}) << 56 >> 56) : (ord(data{0}) << 24 >> 24))
#endif
#endif

#define Binary::readTriad(data) unpack("N", "\x00" . data)[1]
#define Binary::writeTriad(data) (substr(pack("N", data), 1))

#define Binary::readLTriad(data) unpack("V", data . "\x00")[1]
#define Binary::writeLTriad(data) (substr(pack("V", data), 0, -1))

#define Binary::readBool(data) (data{0} !== "\x00")
#define Binary::writeBool(data) (data ? "\x01" : "\x00")

#define Binary::readByte(data) (ord(data))
#define Binary::writeByte(data) (chr(data))

#define Binary::readShort(data) (unpack("n", data)[1])
#define Binary::readLShort(data) (unpack("v", data)[1])
#define Binary::writeShort(data) (pack("n", data))
#define Binary::writeLShort(data) (pack("v", data))

#define Binary::writeInt(data) (pack("N", data))

#define Binary::writeLInt(data) (pack("V", data))

#define Binary::readFloat(data) (ENDIANNESS === 0 ? unpack("f", data)[1] : unpack("f", strrev(data))[1])
#define Binary::readRoundedFloat(data, accuracy) (round(Binary::readFloat(data), accuracy))
#define Binary::writeFloat(data) (ENDIANNESS === 0 ? pack("f", data) : strrev(pack("f", data)))

#define Binary::readLFloat(data) (ENDIANNESS === 0 ? unpack("f", strrev(data))[1] : unpack("f", data)[1])
#define Binary::readRoundedLFloat(data, accuracy) (round(Binary::readLFloat(data), accuracy))
#define Binary::writeLFloat(data) (ENDIANNESS === 0 ? strrev(pack("f", data)) : pack("f", data))

#define Binary::readDouble(data) (ENDIANNESS === 0 ? unpack("d", data)[1] : unpack("d", strrev(data))[1])
#define Binary::writeDouble(data) (ENDIANNESS === 0 ? pack("d", data) : strrev(pack("d", data)))

#define Binary::readLDouble(data) (ENDIANNESS === 0 ? unpack("d", strrev(data))[1] : unpack("d", data)[1])
#define Binary::writeLDouble(data) (ENDIANNESS === 0 ? strrev(pack("d", data)) : pack("d", data))
