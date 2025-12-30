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
      <div className="flex gap-2 w-full justify-between items-center">
        <h1 className="text-2xl">{vehicle.title}</h1>
        <div className='flex gap-2'>
          <Badge>{vehicle.sub_title}</Badge>
          {/*<Badge>{vehicle.sub_title}</Badge>*/}
        </div>
      </div>
      <p>{vehicle.description}</p>
      <Button asChild>
        <Link href={'#'}>
          Viac
        </Link>
      </Button>
  </Card>
  )
}

export default VehicleCard
