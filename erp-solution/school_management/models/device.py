# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Device(models.Model):
    _name = 'device'
    _description = 'Devices Model'
class DeviceCategory(models.Model):
    _name = 'device.category'
    _description = 'Device ategory Model'