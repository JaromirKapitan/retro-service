export interface VehicleInfo {
  id: number
  title: string
  sub_title: string
  docs_html: string
  content_html: string
  brand: string
  model: string
  year_from: number
  year_to?: number | null
  hero_img: string
  specs_html: string
    modifications_html: string
    links_html: string
//     images : {url: string, thumb_url: string}[] - can be empty
    images: Array<{url: string, thumb_url: string}>
}
