package main

import (
    "log"
    "github.com/gofiber/fiber/v3"
)

func main() {
    app := fiber.New()

    app.Get("/", func(c fiber.Ctx) error {
        return c.SendString("Halo Pemrograman Web II")
    })

    // Endpoint Tugas 1
    app.Get("/api/mahasiswa", func(c fiber.Ctx) error {
        return c.JSON(fiber.Map{
            "nim":   "H1H024024",
            "nama":  "Nesa Dwi Cahyani",
            "prodi": "Teknik Komputer",
        })
    })

    log.Fatal(app.Listen(":3000"))
}