import { Card } from '../ui/card'
import { Label } from '../ui/label'
import { Badge } from '../ui/badge'

const VehicleFeatures = () => {
  return (
    <section className='grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4'>
      <Card className='p-4 w-full flex flex-row gap-4 justify-between'>
        <Label>Maximálna rýchlosť</Label>
        <Badge>100km/h</Badge>
      </Card>
      <Card className='p-4 w-full flex flex-row gap-4 justify-between items-center'>
        <Label>Objem motora</Label>
        <Badge>594 cm³</Badge>
      </Card>
      <Card className='p-4 w-full flex flex-row gap-4 justify-between items-center'>
        <Label>Objem palivovej nádrže</Label>
        <Badge>24 l</Badge>
      </Card>
      <Card className='p-4 w-full flex flex-row gap-4 justify-between items-center'>
        <Label>Prevádzková hmotnosť</Label>
        <Badge>615 kg</Badge>
      </Card>
    </section>
  )
}

export default VehicleFeatures