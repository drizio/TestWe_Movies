export const fetchApi = async (url) => {
    try {
        const response = await fetch(url)
        return response.json()
    } catch (error) {
        console.log(error)
        throw error
    }
}
