import { Button } from '../ui/button'
import { Card } from '../ui/card'
import { Link } from '@inertiajs/react'
import { Badge } from '../ui/badge'
import { VehicleCardInfo } from '@/lib/types/VehicleCardInfo'

const VehicleCard = ({ vehicle }: { vehicle: VehicleCardInfo }) => {
  return (
    <Card className="p-4 flex flex-col gap-2 mb-auto">
      <Link href={vehicle.url}>
        <img src={vehicle.thumbnail} alt={vehicle.title} className='w-full h-full object-cover rounded-xl' />
      </Link>
      <div className="flex gap-2 w-full justify-between items-center">
        <Link href={vehicle.url}>
          <h1 className="text-2xl">{vehicle.title}</h1>
        </Link>
        <div className='flex gap-2'>
          <Badge>{vehicle.sub_title}</Badge>
        </div>
      </div>
      <p>{vehicle.description}</p>
      <Button asChild>
        <Link href={vehicle.url}>
          Viac
        </Link>
      </Button>
  </Card>
  )
}

export default VehicleCard
