import React from 'react'
import { Button } from '../ui/button'
import { Card } from '../ui/card'
import { Link } from '@inertiajs/react'
import { Badge } from '../ui/badge'


interface Vehicle {
    id: number
    title: string
    sub_title: string
    description: string
    brand: string
    model: string
    year_from: number
    year_to?: number | null
    thumbnail: string
    [key: string]: any
}

interface VehicleCardProps {
    vehicle: Vehicle
}

const VehicleCard: React.FC<VehicleCardProps> = ({ vehicle }) => {
  return (
    <Card className="p-4 flex flex-col gap-2 mb-auto">
      <Link href={`/vehicles/${vehicle.model}`}>
        <img src={vehicle.thumbnail} alt={vehicle.title} className='w-full h-full object-cover rounded-xl' />
      </Link>
      <div className="flex gap-2 w-full justify-between items-center">
        <Link href={`/vehicles/${vehicle.model}`}>
          <h1 className="text-2xl">{vehicle.title}</h1>
        </Link>
        <div className='flex gap-2'>
          <Badge>{vehicle.sub_title}</Badge>
        </div>
      </div>
      <p>{vehicle.description}</p>
      <Button asChild>
        <Link href={`/vehicles/${vehicle.model}`}>
          Viac
        </Link>
      </Button>
  </Card>
  )
}

export default VehicleCard
